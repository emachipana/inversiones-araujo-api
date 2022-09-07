class RequestDetail < ApplicationRecord
  belongs_to :product
  belongs_to :request
end
