require 'sass'

# set default layout
layout /.*html.erb/ => 'layout.html.erb'

# ignore files with a leading underline (ex: partials)
ignore /\/_.*/