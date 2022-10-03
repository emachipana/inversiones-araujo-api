class ProductsController < ApplicationController
  skip_before_action :authorize, only: %i[ index show ]
  skip_before_action :validate_admin_user, only: %i[ show ]
  before_action :set_product, only: %i[ update destroy show ]
  
  def index
    @products = Product.all.sort_by{ |product| product[:id] }
    @products = @products.map { |product| merge_categories_name(product) }
    render json: @products
  end

  def show
    render json: merge_categories_name(@product)
  end

  def create
    @product = Product.new(product_params)
    if @product.save
      if params[:photo_url]
        photo = Photo.new(url: params[:photo_url], product: @product)
        if photo.save
          render json: merge_categories_name(@product)
        else
          render json: { error: photo.errors.full_messages }, status: :unprocessable_entity
        end
      else
        render json: { error: "Photo is required" }, status: :unprocessable_entity
      end
    else
      render json: { error: @product.errors.full_messages }, status: :unprocessable_entity
    end
  end

  def update
    if @product.update(product_params)
      if params[:photo_url]
        photo = Photo.find(params[:photo_id])

        if photo.update(url: params[:photo_url])
          render json: merge_categories_name(@product)
        else
          render json: { error: photo.errors.full_messages }, status: :unprocessable_entity
        end
      end
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

  def merge_categories_name(product)
    product.as_json.merge({
      sub_category_name: product.sub_category.name,
      category_name: product.sub_category.category.name,
      photos: product.photos
    })
  end
end
