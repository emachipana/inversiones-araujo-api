class QuotationsController < ApplicationController
  def index
    @quotations = Request.all
    @quotations = @quotations.map { |quotation| merge_items(quotation) }
    render json: @quotations
  end

  private

  def merge_items(quotation)
    quotation.as_json.merge(items: quotation.quotation_details)
  end
end
