class Category < ApplicationRecord
  validates :name, presence: true, uniqueness: true

  has_many :sub_categories, dependent: :destroy
end
