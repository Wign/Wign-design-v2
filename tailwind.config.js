module.exports = {
    theme: {
        fontFamily: {
            body: ["Titillium Web", "-apple-system", "BlinkMacSystemFont", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"],
        },
        container: {
            center: true,
        },
        extend: {
            minHeight: {
                '500': '500px',
                '64': '16rem',
                '32': '8rem',
            },
            height: {
                '140': '140px',
                '310': '310px',
            },
            width: {
                '220': '220px',
                '60': '20rem',
            },
            colors: {
                'translucent-80': 'rgba(255,255,255,0.80)',
                'translucent-60': 'rgba(255,255,255,0.60)',
                'translucent-25': 'rgba(255,255,255,0.25)',
                'turkis': '#5CC4C4',
                'turkis-light': '#42B7B7',
                'turkis-dark': '#097373',
                'facebook': '#3C5A99',
                'facebook-dark': '#3B4E8C',
                'summergreen-translucent-5': 'rgba(148,182,171,0.05)',
                'summergreen-translucent-20': 'rgba(148,182,171,0.20)',
                'tamarillo': '#A51729',

            },
            boxShadow: {
                box: '0 0 5px 2px rgba(0,0,0,0.15)',
            },
            borderRadius: {
                default: '2rem'
            }
        }
    },
    variants: {
        visibility: ['responsive', 'group-hover'],
    },
    plugins: [
        // Some useful comment
    ]
};
