ActionController::Routing::Routes.draw do |map|
  map.resource :user_session
  map.resource :account, :controller => 'users'
  map.resources :users
  
  map.root :controller => "welcome"
  map.connect ':controller/:action/:id'
  map.connect ':controller/:action/:id.:format'
end
