class RemoveNullFromUser < ActiveRecord::Migration
  def self.up
    remove_column :users, :email
    add_column :users, :email, :string
  end

  def self.down
    change_column :users, :email, :string, :null => false
  end
end
