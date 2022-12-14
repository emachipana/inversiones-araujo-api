# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema[7.0].define(version: 2022_09_12_013515) do
  # These are extensions that must be enabled in order to support this database
  enable_extension "plpgsql"

  create_table "categories", force: :cascade do |t|
    t.string "name"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["name"], name: "index_categories_on_name", unique: true
  end

  create_table "photos", force: :cascade do |t|
    t.string "url"
    t.bigint "product_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id"], name: "index_photos_on_product_id"
  end

  create_table "products", force: :cascade do |t|
    t.string "name"
    t.bigint "sub_category_id", null: false
    t.integer "stock", default: 0
    t.float "price"
    t.text "description"
    t.string "marca"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.string "unit_metric"
    t.index ["sub_category_id"], name: "index_products_on_sub_category_id"
  end

  create_table "quotation_details", force: :cascade do |t|
    t.bigint "product_id"
    t.bigint "quotation_id", null: false
    t.integer "quantity", default: 1
    t.float "subtotal", default: 0.0
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id", "quotation_id"], name: "index_quotation_details_on_product_id_and_quotation_id", unique: true
    t.index ["product_id"], name: "index_quotation_details_on_product_id"
    t.index ["quotation_id"], name: "index_quotation_details_on_quotation_id"
  end

  create_table "quotations", force: :cascade do |t|
    t.integer "document_type", default: 0
    t.integer "document"
    t.string "client_name"
    t.string "email"
    t.integer "phone"
    t.string "address"
    t.float "total", default: 0.0
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "request_details", force: :cascade do |t|
    t.bigint "product_id"
    t.bigint "request_id", null: false
    t.integer "quantity", default: 1
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id", "request_id"], name: "index_request_details_on_product_id_and_request_id", unique: true
    t.index ["product_id"], name: "index_request_details_on_product_id"
    t.index ["request_id"], name: "index_request_details_on_request_id"
  end

  create_table "requests", force: :cascade do |t|
    t.integer "document_type", default: 0
    t.integer "document"
    t.string "client_name"
    t.string "email"
    t.integer "phone"
    t.string "address"
    t.text "message"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "sub_categories", force: :cascade do |t|
    t.string "name"
    t.bigint "category_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["category_id"], name: "index_sub_categories_on_category_id"
    t.index ["name", "category_id"], name: "index_sub_categories_on_name_and_category_id", unique: true
  end

  create_table "users", force: :cascade do |t|
    t.integer "user_type", default: 0
    t.string "username"
    t.string "name"
    t.string "password_digest"
    t.string "token"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["token"], name: "index_users_on_token", unique: true
    t.index ["username"], name: "index_users_on_username", unique: true
  end

  add_foreign_key "photos", "products"
  add_foreign_key "products", "sub_categories"
  add_foreign_key "quotation_details", "products"
  add_foreign_key "quotation_details", "quotations"
  add_foreign_key "request_details", "products"
  add_foreign_key "request_details", "requests"
  add_foreign_key "sub_categories", "categories"
end
