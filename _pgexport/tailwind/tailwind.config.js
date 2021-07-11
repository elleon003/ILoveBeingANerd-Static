module.exports = {
  mode: 'jit',
  purge: [
    '../*.html',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '7rem',
        '2xl': '8rem',
      },
    },
    colors: {
      yellow: {
        light: '#F8CA80',
        DEFAULT: '#F5B956',
        dark: '#EB960E'
      },
      purple: {
        light: '#9C7BC8',
        DEFAULT: '#7B4FB6',
        dark: '#5C3A8A'
      },
      black: {
        DEFAULT: '#282829'
      },
      white: {
        DEFAULT: '#F2F3F8'
      },
      grey: {
        light: '#ABABAB',
        DEFAULT: '#8F8F8F',
        dark: '#6B6B6B'
      }
    },
    fontFamily: {
      'sans': ['PTSans', 'ui-sans-serif', 'system-ui'],
      'display': ['Augor'],
      'body': ['PTSans']
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
