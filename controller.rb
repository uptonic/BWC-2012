require 'sass'

# set default layout
layout /.*html.erb/ => 'layout.html.erb'

# ignore files with a leading underline (ex: partials)
ignore /\/_.*/

before 'index.html.erb' do
  @nav_home = true
end
before '/gallery/index.html.erb' do
  @nav_gallery = true
end

before '/about/index.html.erb' do
  @nav_about = true
end

before '/process/index.html.erb' do
  @nav_process = true
end

before '/testimonials/index.html.erb' do
  @nav_testimonials = true
end

before '/resources/index.html.erb' do
  @nav_resources = true
end

before '/contact/index.html.erb' do
  @nav_contact = true
end