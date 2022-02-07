module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                '102': '28rem',
                '108': '32rem',
                '114': '36rem',
                '120': '40rem',
                '126': '44rem',
                '132': '48rem',
            },
        },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
}
