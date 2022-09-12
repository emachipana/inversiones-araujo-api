class Product < ApplicationRecord
  validates :name, presence: true
  validates :price, presence: true
  validates :description, presence: true

  belongs_to :sub_category
  has_many :quotation_details, dependent: :nullify
  has_many :request_details, dependent: :nullify
  has_many :photos, dependent: :destroy
end
