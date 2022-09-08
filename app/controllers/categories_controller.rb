class CategoriesController < ApplicationController
  before_action :set_category, only: %i[update]

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

  def update
    if @category.update(params[:name])
      render json: @category
    else
      render json: { error: @category.errors.full_messages }, status: :unprocessable_entity
    end
  end

  private

  def set_category
    @category = Category.find(params[:id])
  end
end
