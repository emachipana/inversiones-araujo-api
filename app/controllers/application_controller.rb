class ApplicationController < ActionController::API
  include ActionController::HttpAuthentication::Token::ControllerMethods

  before_action :authorize
  before_action :validate_admin_user

  def current_user
    @current_user ||= authenticate_token
  end

  def authorize
    authenticate_token || respond_unauthorized("Access denied")
  end

  def validate_admin_user
    if current_user&.client?
      respond_unauthorized("You have to be admin for this action")
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
