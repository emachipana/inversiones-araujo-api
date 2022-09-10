puts "Destroying all categories"
Category.destroy_all

puts "Destroying all Quotations"
Quotation.destroy_all

puts "Destroying all Requests"
Request.destroy_all

puts "Destoying all Users"
User.destroy_all

# create users
puts "Create users"
users = [
  { 
    name: "Mariano Chipana Contreras",
    username: "admin1",
    password: "123456",
    user_type: 1
  },
  { 
    name: "Yurfa Araujo Estrada",
    username: "admin",
    password: "123456",
    user_type: 1
  },
  {
    name: "Testino Di Prueba",
    username: "client-test",
    password: "letmein"
  }
]

users.each do |user|
  user = User.new(user)
  if user.save
    puts "User was created successfully"
  else
    puts user.errors.full_messages.join(" ")
  end
end
