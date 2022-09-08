class SubCategoriesController < ApplicationController
  before_action :set_sub_category, only: %i[ update ]
  skip_before_action :authorize, only: %i[ index ]

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

  def update
    if @sub_category.update(sub_category_params)
      render json: @sub_category
    else
      render json: { error: @sub_category.errors.full_messages }, status: :unprocessable_entity
    end
  end

  private

  def sub_category_params
    params.permit(:category_id, :name)
  end

  def set_sub_category
    @sub_category = SubCategory.find(params[:id])
  end
end
