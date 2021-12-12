module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
        pagination: theme => ({
          // Customize the color only. (optional)
          color: theme('colors.teal.600'),
      
          // Customize styling using @apply. (optional)
          wrapper: 'flex justify-center list-reset',
      
          // Customize styling using CSS-in-JS. (optional)
          wrapper: {
              'display': 'flex',
              'justify-items': 'center',
              '@apply list-reset': {},
          },
      })
    
  },
  variants: {
    extend: {},
  },
  plugins: [

    require('tailwindcss-plugins/pagination'),
    
  ],
}
