/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{php,html,js}',
    './**/*.{php,html,js}',
    './page-templates/**/*.{php,html,js}',
    './template-parts/**/*.{php,html,js}',
    './partials/**/*.{php,html,js}',
  ],
  safelist: [
    'w-1/2',
    'w-2/3',
    'lg:grid-cols-3',
    'lg:grid-cols-4',
    'lg:grid-cols-5',
    'lg:grid-cols-6',
    'lg:grid-cols-7',
  ],
  theme: {
    extend: {
      fontFamily: {
        'pathway': ['"Pathway Extreme"', 'sans-serif'],
      },
      container: {
        padding: {
          DEFAULT: '1.5rem',
          sm: '1.25rem',
          md: '1.5rem',
          lg: '2rem',
          xl: '1rem',
        },
        screens: {
          sm: '100%',
          md: '100%',
          lg: '1310px',
          xl: '1440px',
          '2xl': '1536px',
        },
      },
      keyframes: {
        shake: {
          '0%, 100%': { transform: 'translateX(2px)' },
          '50%': { transform: 'translateX(-2px)' },
        }
      },
      animation: {
        shake: 'shake 1s ease-in-out infinite',
      }
    },
  },
  plugins: [],
}