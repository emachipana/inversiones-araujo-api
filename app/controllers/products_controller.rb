class ProductsController < ApplicationController
  skip_before_action :authorize, only: %i[ index ]
  before_action :set_product, only: %i[ update destroy ]
  
  def index
    @products = Product.all
    @products = @products.map { |product| product.as_json.merge(extract_categories_name(product)) }
    render json: @products
  end

  def create
    @product = Product.new(product_params)
    if @product.save
     render json: @product.as_json.merge(extract_categories_name(@product)) 
    else
      render json: { error: @product.errors.full_messages }, status: :unprocessable_entity
    end
  end

  def update
    if @product.update(product_params)
      render json: @product.as_json.merge(extract_categories_name(@product))
    else
      render json: { error: @product.errors.full_messages }, status: :unprocessable_entity
    end
  end

  def destroy
    @product.destroy
    head :ok
  end

  private

  def product_params
    params.permit(:name, :sub_category_id, :stock, :price, :description, :marca, :unit_metric)
  end

  def set_product
    @product = Product.find(params[:id])
  end

  def extract_categories_name(product)
    {
      sub_category_name: product.sub_category.name,
      category_name: product.sub_category.category.name
    }
  end
end
