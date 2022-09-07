class QuotationDetail < ApplicationRecord
  validates :quantity, presence: true
  validates :subtotal, presence: true

  belongs_to :product
  belongs_to :quotation
end
