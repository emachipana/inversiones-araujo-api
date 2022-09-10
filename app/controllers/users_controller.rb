class UsersController < ApplicationController
  skip_before_action :authorize, only: :create
  skip_before_action :validate_admin_user, only: %i[ show update ]

  def create
    @user = User.new(user_params)
    if @user.save
      render json: @user.as_json(except: :password_digest), status: :created
    else
      render json: { error: @user.errors.full_messages }, status: :unprocessable_entity
    end
  end

  def show
    render json: current_user.as_json(except: :password_digest)
  end

  def update
    if current_user.update(user_params)
      render json: current_user.as_json(except: :password_digest)
    else
      render json: { error: current_user.errors.full_messages }, status: :unprocessable_entity
    end
  end

  private

  def user_params
    params.permit(:name, :username, :password)
  end
end
