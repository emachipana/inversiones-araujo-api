class SubCategory < ApplicationRecord
  validates :name, presence: true
  validates_uniqueness_of :name, scope: :category_id

  belongs_to :category
  has_many :products, dependent: :destroy
end
