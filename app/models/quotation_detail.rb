class QuotationDetail < ApplicationRecord
  belongs_to :product
  belongs_to :quotation
end
