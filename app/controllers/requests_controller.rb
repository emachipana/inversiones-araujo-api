class RequestsController < ApplicationController
  def index
    @requests = Request.all
    @requests = @requests.map{ |request| request.as_json.merge(items: request.request_details) }
    render json: @requests
  end

  def create
    @request = Request.new(request_params)
    if !params[:items] || params[:items].size == 0
      render json: { error: [ "Items is required" ] }
    else
      if @request.save
        params[:items].each do |item|
          @request_detail = RequestDetail.new(
            request: @request,
            product_id: item["product_id"],
            quantity: item["quantity"]
          )

          if @request_detail.save
            render json: @request.as_json.merge(items: @request.request_details)
          else
            render json: { error: @request_detail.errors.full_messages }
          end
        end
      else
        render json: { error: @request.errors.full_messages }, status: :unprocessable_entity
      end
    end
  end

  private

  def request_params
    params.permit(:document_type, :document, :client_name, :email, :phone, :address, :message)
  end

end
