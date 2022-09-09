class RequestsController < ApplicationController
  before_action :set_request, only: %i[ show destroy ]

  def index
    @requests = Request.all
    @requests = @requests.map{ |request| merge_items(request) }
    render json: @requests
  end

  def show
    render json: merge_items(@request)
  end

  def create
    @request = Request.new(request_params)
    if !params[:items] || params[:items].size == 0
      render json: { error: [ "Items is required" ] }
    else
      if @request.save
        record = []
        params[:items].each do |item|
          @request_detail = RequestDetail.new(
            request: @request,
            product_id: item["product_id"],
            quantity: item["quantity"]
          )

          if @request_detail.save
            record.push(true)
          else
            record.push(false)
          end
        end

        if record.find { |el| el == false }.nil?
          render json: merge_items(@request)
        else
          @request.destroy
          render json: { error: [ "Something was wrong" ] }, status: :unprocessable_entity
        end
      else
        render json: { error: @request.errors.full_messages }, status: :unprocessable_entity
      end
    end
  end

  def destroy
    @request.destroy
    head :ok
  end

  private

  def request_params
    params.permit(:document_type, :document, :client_name, :email, :phone, :address, :message)
  end

  def set_request
    @request = Request.find(params[:id])
  end

  def merge_items(request)
    request.as_json.merge(items: request.request_details)
  end
end
