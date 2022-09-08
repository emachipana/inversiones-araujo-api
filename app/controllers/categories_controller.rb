class CategoriesController < ApplicationController
  def index
    @categories = Category.all
    render json: @categories
  end

  def create
    @category = Category.new(name: params[:name])
    if @category.save
      render json: @category, status: :created
    else
      render json: { error: @category.errors.full_messages }, status: :unprocessable_entity
    end
  end
end
