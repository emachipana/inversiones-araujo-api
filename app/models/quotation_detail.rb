class QuotationDetail < ApplicationRecord
  validates :quantity, presence: true
  validates :subtotal, presence: true
  validates_uniqueness_of :product_id, scope: :quotation_id

  belongs_to :product
  belongs_to :quotation
end
