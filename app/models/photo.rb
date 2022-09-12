class Photo < ApplicationRecord
  validates :public_id, presence: true, uniqueness: true
  validates :url, presence: true
  
  belongs_to :product
end
