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

  private

  def merge_items(quotation)
    quotation.as_json.merge(items: quotation.quotation_details)
  end

  def set_quotation
    @quotation = Quotation.find(params[:id])
  end
end
