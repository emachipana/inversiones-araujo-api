class ApplicationController < ActionController::API
  include ActionController::HttpAuthentication::Token::ControllerMethods

  before_action :authorize
  before_action :validate_admin_user

  def current_user
    @current_user ||= authenticate_token
  end

  def authorize
    authenticate_token || respond_unauthorized("Acceso denegado")
  end

  def validate_admin_user
    if current_user&.client?
      respond_unauthorized("Tienes que ser administrador para realizar esta acción")
    end
  end

  private

  def respond_unauthorized(message)
    error = { error: message }
    render json: error, status: :unauthorized
  end
  
  def authenticate_token
    authenticate_with_http_token do |token, _options|
      User.find_by(token: token)
    end
  end
end
