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
        primary: '#2d69ff',
        secondary: '#ffb43b',
        dark: '#3f3d56',
        accent: '#ec4899',
        white: '#f7fafc',
        black: '#0a0a0a',
        transparent: 'transparent',
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
        }
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
