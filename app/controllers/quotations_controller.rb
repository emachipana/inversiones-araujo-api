class QuotationsController < ApplicationController
  before_action :set_quotation, only: %i[ show ]

  def index
    @quotations = Quotation.all
    @quotations = @quotations.map { |quotation| merge_items(quotation) }
    render json: @quotations
  end

  def show
    render json: merge_items(@quotation)
  end

  def create
    @quotation = Quotation.new(quotation_params)
    if !params[:items] || params[:items].size.zero?
      render json: { error: [ "Items is required" ] }, status: :unprocessable_entity
    else
      if @quotation.save
        record = []
        params[:items].each do |item|
          product = Product.find(item["product_id"]) 
    
          @quotation_detail = QuotationDetail.new(
            quotation: @quotation,
            product: product,
            quantity: item["quantity"],
            subtotal: product.price * item["quantity"]
          )

          if @quotation_detail.save then record.push(true) else record.push(false) end
        end

        if record.find { |el| el == false }.nil?
          total = @quotation.quotation_details.map{ |el| el.subtotal }.reduce(:+)
          @quotation.update(total: total)
          render json: merge_items(@quotation)
        else
          @quotation.destroy
          render json: { error: [ "Something was wrong" ] }, status: :unprocessable_entity
        end
      else
        render json: { error: @quotation.errors.full_messages }, status: :unprocessable_entity
      end
    end
  end

  private

  def merge_items(quotation)
    quotation.as_json.merge(items: quotation.quotation_details)
  end

  def set_quotation
    @quotation = Quotation.find(params[:id])
  end

  def quotation_params
    params.permit(:document_type, :document, :client_name, :email, :phone, :address, :total)
  end
end
