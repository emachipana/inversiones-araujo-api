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
          render json: @request.as_json.merge(items: @request.request_details)
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
    @request = Request.find(params[:id])
    @request.destroy
    head :ok
  end

  private

  def request_params
    params.permit(:document_type, :document, :client_name, :email, :phone, :address, :message)
  end

end
