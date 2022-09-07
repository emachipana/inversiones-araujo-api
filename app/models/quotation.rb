class Quotation < ApplicationRecord
  validates :document_type, presence: true
  enum document_type: { 
    dni: 0,
    ruc: 1,
    other: 2
  }
  validates :document, presence: true
  validates :client_name, presence: true
  validates :email, format: { with: URI::MailTo::EMAIL_REGEXP }, allow_nil: true

  has_many :quotation_details, dependent: :destroy
end
