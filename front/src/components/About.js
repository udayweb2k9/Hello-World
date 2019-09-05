import React,{ Component } from 'react';
import ReactDOM from 'react-dom';

class About extends Component{
    render(){
        return (
            <React.Fragment>
                <section className="banner style1 orient-right content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
                    <div className="content">
                        <h1>About</h1>
                        <p className="major">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam magna erat, bibendum eu rhoncus imperdiet, auctor in erat. Quisque rutrum dictum metus eu blandit. Etiam dui lacus, scelerisque nec malesuada ac, hendrerit quis turpis. Morbi sollicitudin nulla lacus, ut pretium elit maximus at. Suspendisse mollis felis quam. Donec lorem urna, imperdiet ac ligula efficitur, mollis elementum turpis. Morbi auctor at nisl et interdum. Nam lacinia sagittis orci quis congue. 
                        </p>
                        <ul className="actions stacked">
                            <li><a href="#first" className="button big wide smooth-scroll-middle">Get Started</a></li>
                        </ul>
                    </div>
                    <div className="image">
                        <img src="2.jpg" alt=""  />
                    </div>
                </section>
            </React.Fragment>
        );
    }
}

export default About;