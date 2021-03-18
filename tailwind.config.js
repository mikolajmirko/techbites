module.exports = {
  purge: {
    content: [
      './app/**/*.php',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
    ],
  },
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: '#635ACF',
        secondary: '#FF6584',
        dark: '#3F3D56',
        accent: '#FFB43B',
        white: '#F7FAFC',
        gray: {
          100: '#f7fafc',
          200: '#edf2f7',
          300: '#e2e8f0',
          400: '#cbd5e0',
          500: '#a0aec0',
          600: '#718096',
          700: '#4a5568',
          800: '#2d3748',
          900: '#1a202c',
        },
        transparent: 'transparent'
      },
      fontFamily: {
        sans: ['Inter', 'Arial', 'sans-serif']
      },
    },
  },
  variants: {
    extend: {
      opacity: ['dark']
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
