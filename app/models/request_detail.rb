class RequestDetail < ApplicationRecord
  validates :quantity, presence: true
  validates_uniqueness_of :product_id, scope: :request_id

  belongs_to :product
  belongs_to :request
end
