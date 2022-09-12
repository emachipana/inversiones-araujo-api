Rails.application.config.middleware.insert_before 0, Rack::Cors do
  allow do
    origins "example.com"

    resource "http://localhost:3000/",
      headers: :any,
      methods: [:get, :post, :put, :patch, :delete, :options, :head]
  end
end
