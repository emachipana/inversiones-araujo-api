class SubCategoriesController < ApplicationController
  def index
    @sub_categories = SubCategory.all
    render json: @sub_categories
  end
  
  def create
    @sub_category = SubCategory.new(sub_category_params)
    if @sub_category.save
      render json: @sub_category, status: :created
    else
      render json: { error: @sub_category.errors.full_messages }, status: :unprocessable_entity
    end
  end

  private

  def sub_category_params
    params.permit(:category_id, :name)
  end
end
