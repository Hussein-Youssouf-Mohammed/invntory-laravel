import Token from './Token'
import AppStroage from './AppStroage'

class User {
    responseAfterLogin(res) {
        const token = res.data.access_token
        const user  = res.data.name
        if(Token.isValid(token)) {
            AppStroage.store(token, user)
        }
    }

    hasToken() {
        const storeToken = localStorage.getItem('token')
        if(storeToken) {
            return Token.isValid(storeToken) ? true : false
        }
        return false
    }

    loggedIn() {
        return this.hasToken()
    }

    name() {
        if(this.loggedIn()) {

            return localStorage.getItem('user')
        }
    }
}
export default User = new User()