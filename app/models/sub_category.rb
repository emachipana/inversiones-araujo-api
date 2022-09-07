class SubCategory < ApplicationRecord
  validates :name, presence: true, uniqueness: true
  
  belongs_to :category
  has_many :products, dependent: :destroy
end
