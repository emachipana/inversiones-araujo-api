Rails.application.routes.draw do
  # sessions
  post "/login" => "sessions#create"
  delete "/logout" => "sessions#destroy"
  post "/signup" => "users#create"

  # profile
  get "/profile" => "users#show"
  patch "/profile" => "users#update"
end
