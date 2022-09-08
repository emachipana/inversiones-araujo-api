class ProductsController < ApplicationController
  skip_before_action :authorize, only: %i[ index ]
  
  def index
    @products = Product.all
    @products = @products.map { |product|
      product.as_json.merge({
        sub_category_name: product.sub_category.name,
        category_name: product.sub_category.category.name
      })
    }
    render json: @products
  end
end
