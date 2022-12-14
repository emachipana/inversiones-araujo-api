Rails.application.routes.draw do
  # sessions
  post "/login" => "sessions#create"
  delete "/logout" => "sessions#destroy"
  post "/signup" => "users#create"

  # profile
  get "/profile" => "users#show"
  patch "/profile" => "users#update"

  # categories
  resources :categories, except: %i[ show new edit ]

  # sub categories
  resources :sub_categories, except: %i[ show new edit ]

  # products

  resources :products, except: %i[ new edit ]

  # requests

  resources :requests, except: %i[ new edit update ]

  # quotations

  resources :quotations, except: %i[ new edit update ]
end
