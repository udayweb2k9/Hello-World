import React,{ Component } from 'react';
import ReactDOM from 'react-dom';

class StoryDetails extends Component{
    render(){
        return (
            <React.Fragment>
                <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
                    <div class="content">
                        <h1>Story</h1>
                        <p class="major">
                        2sLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam magna erat, bibendum eu rhoncus imperdiet, auctor in erat. Quisque rutrum dictum metus eu blandit. Etiam dui lacus, scelerisque nec malesuada ac, hendrerit quis turpis. Morbi sollicitudin nulla lacus, ut pretium elit maximus at. Suspendisse mollis felis quam. Donec lorem urna, imperdiet ac ligula efficitur, mollis elementum turpis. Morbi auctor at nisl et interdum. Nam lacinia sagittis orci quis congue. 
                        </p>
                        <ul class="actions stacked">
                            <li><a href="#first" class="button big wide smooth-scroll-middle">Get Started</a></li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="1.jpg" alt=""  />
                    </div>
                </section>
            </React.Fragment>
        );
    }
}

export default StoryDetails;