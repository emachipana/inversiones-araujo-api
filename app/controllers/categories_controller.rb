class CategoriesController < ApplicationController
  before_action :set_category, only: %i[ update destroy ]
  skip_before_action :authorize, only: %i[ index ]

  def index
    @categories = Category.all.sort_by{ |category| category[:id] }
    @categories = @categories.map { |category| category.as_json.merge(sub_categories: category.sub_categories) }
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
    if @category.update(name: params[:name])
      render json: @category
    else
      render json: { error: @category.errors.full_messages }, status: :unprocessable_entity
    end
  end

  def destroy
    @category.destroy
    head :ok
  end

  private

  def set_category
    @category = Category.find(params[:id])
  end
end
