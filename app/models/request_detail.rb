class RequestDetail < ApplicationRecord
  validates :quantity, presence: true

  belongs_to :product
  belongs_to :request
end
