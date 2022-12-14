class SessionsController < ApplicationController
  skip_before_action :authorize, only: :create
  skip_before_action :validate_admin_user, only: :destroy

  def create
    user = User.find_by(username: params[:username])
    if user&.authenticate(params[:password])
      user.regenerate_token
      render json: user.as_json(except: :password_digest)
    else
      respond_unauthorized("Usuario o contraseña errados")
    end
  end

  def destroy
    current_user.invalidate_token
    head :ok
  end
end
