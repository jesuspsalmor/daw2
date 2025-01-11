// Inicializar Lienzo

const canvas = document.getElementById('lienzo');
const ctx = canvas.getContext('2d');

const width = canvas.width = window.innerWidth;
const height = canvas.height = window.innerHeight;

// function to generate random number

function random(min, max) {
  const num = Math.floor(Math.random() * (max - min + 1)) + min;
  return num;
}

class Ball {

   constructor(x, y, velX, velY, color, size) {
        this.x = x; //posición horizontal
        this.y = y; //posición vertical
        this.velX = velX; //velocidad horizontal
        this.velY = velY; //velocidad vertical
        this.color = color; //color
        this.size = size; //tamaño
   }

   draw() {
      ctx.beginPath();
      ctx.fillStyle = this.color;
      ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI);
      ctx.fill();
   }

   update() {
      if ((this.x + this.size) >= width) {
         this.velX = -(this.velX);
      }

      if ((this.x - this.size) <= 0) {
         this.velX = -(this.velX);
      }

      if ((this.y + this.size) >= height) {
         this.velY = -(this.velY);
      }

      if ((this.y - this.size) <= 0) {
         this.velY = -(this.velY);
      }

      this.x += this.velX;
      this.y += this.velY;
   }

   collisionDetect() {
      for (let j = 0; j < balls.length; j++) {
         if (!(this === balls[j])) {
            const dx = this.x - balls[j].x;
            const dy = this.y - balls[j].y;
            const distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < this.size + balls[j].size) {
            //   balls[j].color = this.color = 'rgb(' + random(0, 255) + ',' + random(0, 255) + ',' + random(0, 255) +')';
              this.velX=-this.velX;
              this.velY=-this.velY;
      
            }
         }
      }
   }

}

var balls = [];

while (balls.length < 15) {
   const size = random(5,35);
   let ball = new Ball(
       // la posición de las pelotas, se dibujará al menos siempre
        // como mínimo a un ancho de la pelota de distancia al borde del
        // canvas, para evitar errores en el dibujo
      
      random(0 + size,width - size),
      random(0 + size,height - size),
      random(-10,10),
      random(-15,15),
      'rgb(' + random(0,255) + ',' + random(0,255) + ',' + random(0,255) +')',
      size
   );

  balls.push(ball);
}

function loop() {
   ctx.fillStyle = 'rgba(215, 245, 255, 0.25)';
   ctx.fillRect(0, 0, width, height);

   for (let i = 0; i < balls.length; i++) {
     balls[i].draw();
     balls[i].update();
     balls[i].collisionDetect();
   }

   requestAnimationFrame(loop);
}

loop();