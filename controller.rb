require 'sass'

# set default layout
layout /.*html.erb/ => 'layout.html.erb'

# ignore files with a leading underline (ex: partials)
ignore /\/_.*/

before 'index.html.erb' do
  @body_class = "home"
end

before 'index.html.erb' do
  @nav_home = true
end

before '/gallery/index.html.erb' do
  @body_class = "gallery"
  @nav_gallery = true
end

before '/gallery/kitchens/index.html.erb' do
  @body_class = "gallery"
  @nav_gallery = true
end

before '/gallery/baths/index.html.erb' do
  @body_class = "gallery"
  @nav_gallery = true
end

before '/gallery/interiors/index.html.erb' do
  @body_class = "gallery"
  @nav_gallery = true
end

before '/gallery/exteriors/index.html.erb' do
  @body_class = "gallery"
  @nav_gallery = true
end

before '/about/index.html.erb' do
  @body_class = "about"
  @nav_about = true
end

before '/testimonials/index.html.erb' do
  @body_class = "testimonials"
  @nav_testimonials = true
end

before '/resources/index.html.erb' do
  @body_class = "resources"
  @nav_resources = true
end

before '/process/index.html.erb' do
  @body_class = "process"
  @nav_process = true
end

before '/contact/index.html.erb' do
  @body_class = "contact"
  @nav_contact = true
end