apt update && apt install git cmake
git clone https://github.com/mpromonet/v4l2rtspserver.git
cd v4l2rtspserver && cmake . && make && make install
echo "v4l2rtspserver /dev/video0 &" >> /etc/rc.local
v4l2rtspserver /dev/video0
