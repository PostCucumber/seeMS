module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    screens: {
      'sm': '28em',
      // => @media (min-width: 448px) { ... }

      'md': '48em',
      // => @media (min-width: 768px) { ... }

      'lg': '64em',
      // => @media (min-width: 1024px) { ... }

      'xl': '85.375em',
      // => @media (min-width: 1366px) { ... }

      '2xl': '120em',
      // => @media (min-width: 1920px) { ... } 
      
      '3xl': '160em',
      // => @media (min-width: 2560px) { ... } 

    },
    extend: {}
  },
  variants: {
    outline: ['responsive', 'focus'],
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
