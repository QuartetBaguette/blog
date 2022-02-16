const Ziggy = {"url":"http:\/\/blog.test","port":null,"defaults":{},"routes":{"logout":{"uri":"logout","methods":["POST"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"home":{"uri":"home","methods":["GET","HEAD"]},"blogs":{"uri":"blogs","methods":["GET","HEAD"]},"blog":{"uri":"blog","methods":["GET","HEAD"]},"loginpage":{"uri":"loginpage","methods":["GET","HEAD"]},"blog.create":{"uri":"blog\/create","methods":["POST"]},"blog.delete":{"uri":"blog\/delete","methods":["POST"]},"settings":{"uri":"settings","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
