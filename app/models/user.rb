class User < ApplicationRecord
  validates :username, presence: true, uniqueness: true
  enum user_type: { client: 0, admin: 1 }
  validates :name, presence: true

  has_secure_password
  has_secure_token

  def invalidate_token
    update(token: nil)
  end
end
